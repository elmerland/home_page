#include &lt;stdbool.h&gt;
#include &lt;assert.h&gt;
#include &lt;pthread.h&gt;
#include "int-pipe.h"

bool int_pipe_empty(int_pipe_t *intp) {
  return bounded_buffer_empty(&intp-&gt;buf);
}

bool int_pipe_full(int_pipe_t *intp) {
  return bounded_buffer_full(&intp-&gt;buf);
}

void int_pipe_init(int_pipe_t *intp) {
  bounded_buffer_init(&intp-&gt;buf);
  intp-&gt;closed=false;
}

int int_pipe_size(int_pipe_t *intp) {
  return bounded_buffer_size(&intp-&gt;buf);
}

void int_pipe_close(int_pipe_t *intp) {
  intp-&gt;closed = true;
}

bool int_pipe_closed(int_pipe_t *intp) {
  return intp-&gt;closed;
}

int int_pipe_write(int_pipe_t *intp, int n) {
  ...
}

int int_pipe_read(int_pipe_t *intp) {
  ...
}