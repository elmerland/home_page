#include &lt;stdbool.h&gt;
#include &lt;assert.h&gt;
#include &lt;pthread.h&gt;
#include "int-pipe4.h"


bool int_pipe_empty(int_pipe_t *intp) {
  return bounded_buffer_empty(&intp-&gt;buf);
}

bool int_pipe_full(int_pipe_t *intp) {
  return bounded_buffer_full(&intp-&gt;buf);
}

void int_pipe_init(int_pipe_t *intp) {
  // Initialize the buffer.
  bounded_buffer_init(&intp-&gt;buf);
  // Set pipe state to open.
  intp-&gt;closed=false;
  // Initialize the lock.
  pthread_mutex_init(&intp-&gt;mutex, NULL);
  // Initialize the two conditional variables.
  pthread_cond_init (&intp-&gt;avail_data, NULL);
  pthread_cond_init (&intp-&gt;avail_space, NULL);
}

int int_pipe_size(int_pipe_t *intp) {
  return bounded_buffer_size(&intp-&gt;buf);
}

void int_pipe_close(int_pipe_t *intp) {
  // Set pipe state to closed.
  intp-&gt;closed = true;
  // Broadcast signals to all threads.
  pthread_cond_broadcast(&intp-&gt;avail_space);
  pthread_cond_broadcast(&intp-&gt;avail_data);
}


bool int_pipe_closed(int_pipe_t *intp) {
  return intp-&gt;closed;
}

int int_pipe_write(int_pipe_t *intp, int n) {
  pthread_mutex_lock(&intp-&gt;mutex);
  while(int_pipe_full(intp) && !int_pipe_closed(intp)) {
    pthread_cond_wait(&intp-&gt;avail_space,&intp-&gt;mutex);
  }
  if(int_pipe_closed(intp)) {
    pthread_mutex_unlock(&intp-&gt;mutex);
    return 0;
  }
  assert(!int_pipe_full(intp) && !int_pipe_closed(intp));
  bounded_buffer_add(&intp-&gt;buf, n);
  // Signal available data conditional variable
  pthread_cond_signal(&intp-&gt;avail_data);
  pthread_mutex_unlock(&intp-&gt;mutex);
  return 1;
}

int int_pipe_read(int_pipe_t *intp) {
  pthread_mutex_lock(&intp-&gt;mutex);
  while(int_pipe_empty(intp) && !int_pipe_closed(intp)) {
    pthread_cond_wait(&intp-&gt;avail_data,&intp-&gt;mutex);
  }
  if(int_pipe_closed(intp)) {
    pthread_mutex_unlock(&intp-&gt;mutex);
    return 0;
  }
  assert(!int_pipe_empty(intp) && !int_pipe_closed(intp));
  int n = bounded_buffer_remove(&intp-&gt;buf);
  // Signal available space conditional variable.
  pthread_cond_signal(&intp-&gt;avail_space);
  pthread_mutex_unlock(&intp-&gt;mutex);
  return n;
}