#include <stdbool.h>
#include <assert.h>
#include <pthread.h>
#include "pipe.h"


bool int_pipe_empty(int_pipe_t *intp) {
	return bounded_buffer_empty(&intp->buf);
}

bool int_pipe_full(int_pipe_t *intp) {
	return bounded_buffer_full(&intp->buf);
}

void int_pipe_init(int_pipe_t *intp) {
	// Initialize the buffer.
	bounded_buffer_init(&intp->buf);
	// Set pipe state to open.
	intp->closed=false;
	// Initialize the lock.
	pthread_mutex_init(&intp->mutex, NULL);
	// Initialize the two conditional variables.
	pthread_cond_init (&intp->avail_data, NULL);
	pthread_cond_init (&intp->avail_space, NULL);
}

int int_pipe_size(int_pipe_t *intp) {
	return bounded_buffer_size(&intp->buf);
}

void int_pipe_close(int_pipe_t *intp) {
	// Set pipe state to closed.
	intp->closed = true;
	// Broadcast signals to all threads.
	pthread_cond_broadcast(&intp->avail_space);
	pthread_cond_broadcast(&intp->avail_data);
}

bool int_pipe_closed(int_pipe_t *intp) {
	return intp->closed;
}

int int_pipe_write(int_pipe_t *intp, int n) {
	// Get initial lock on the mutex.
	pthread_mutex_lock(&intp->mutex);
	// Loop until the pipe is not full.
	while(int_pipe_full(intp) && !int_pipe_closed(intp)) {
		// Release mutex lock, wait for available space signal
		// and regain mutex lock.
		pthread_cond_wait(&intp->avail_space,&intp->mutex);
	}
	if(int_pipe_closed(intp)) {
		// Release mutex lock
		pthread_mutex_unlock(&intp->mutex);
		return 0;
	}
	// Write to buffer.
	assert(!int_pipe_full(intp) && !int_pipe_closed(intp));
	bounded_buffer_add(&intp->buf, n);
	// Signal available data conditional variable
	pthread_cond_signal(&intp->avail_data);
	// Release mutex
	pthread_mutex_unlock(&intp->mutex);
	return 1;
}

int int_pipe_read(int_pipe_t *intp) {
	// Get initial lock on the mutex.
	pthread_mutex_lock(&intp->mutex);
	// Loop until the pipe is not empty.
	while(int_pipe_empty(intp) && !int_pipe_closed(intp)) {
		// Release mutex lock, wait for the available date signal
		// and regain mutex lock.
		pthread_cond_wait(&intp->avail_data,&intp->mutex);
	}
	if(int_pipe_closed(intp)) {
		// Release mutex lock.
		pthread_mutex_unlock(&intp->mutex);
		return 0;
	}
	// Read and remove element from buffer.
	assert(!int_pipe_empty(intp) && !int_pipe_closed(intp));
	int n = bounded_buffer_remove(&intp->buf);
	// Signal available space conditional variable.
	pthread_cond_signal(&intp->avail_space);
	// Release mutex.
	pthread_mutex_unlock(&intp->mutex);
	return n;
}
