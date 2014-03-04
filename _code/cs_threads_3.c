int int_pipe_write(int_pipe_t *intp, int n) {
  while(int_pipe_full(intp) && !int_pipe_closed(intp)) {
    /* Busy wait... */}
  if(int_pipe_closed(intp)) {return 0;}
  assert(!int_pipe_full(intp) && !int_pipe_closed(intp));
  bounded_buffer_add(&intp-&gt;buf, n);
  return 1;
}

int int_pipe_read(int_pipe_t *intp) {
  while(int_pipe_empty(intp) && !int_pipe_closed(intp)) {
    /* Busy wait... */}
  if(int_pipe_closed(intp)) {return 0;}
  assert(!int_pipe_empty(intp) && !int_pipe_closed(intp));
  int n = bounded_buffer_remove(&intp-&gt;buf);
  return n;
}