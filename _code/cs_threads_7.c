void int_pipe_init(int_pipe_t *intp) {
  bounded_buffer_init(&intp-&gt;buf);
  intp-&gt;closed=false;
  pthread_mutex_init(&intp-&gt;mutex, NULL);
  pthread_mutex_init(&intp-&gt;avail_data, NULL);
  pthread_mutex_lock(&intp-&gt;avail_data);
}

int int_pipe_write(int_pipe_t *intp, int n) {
  while(int_pipe_full(intp) && !int_pipe_closed(intp)) {
    /* Busy wait... */}
  if(int_pipe_closed(intp)) {return 0;}
  pthread_mutex_lock(&intp-&gt;mutex);
  assert(!int_pipe_full(intp) && !int_pipe_closed(intp));
  bounded_buffer_add(&intp-&gt;buf, n);
  pthread_mutex_unlock(&intp-&gt;avail_data);
  pthread_mutex_unlock(&intp-&gt;mutex);
  return 1;
}

int int_pipe_read(int_pipe_t *intp) {
  pthread_mutex_lock(&intp-&gt;mutex);
  while(int_pipe_empty(intp) && !int_pipe_closed(intp)) {
    pthread_mutex_unlock(&intp-&gt;mutex);
    pthread_mutex_lock(&intp-&gt;avail_data);
    pthread_mutex_lock(&intp-&gt;mutex);
  }
  if(int_pipe_closed(intp)) {return 0;}
  assert(!int_pipe_empty(intp) && !int_pipe_closed(intp));
  int n = bounded_buffer_remove(&intp-&gt;buf);
  pthread_mutex_unlock(&intp-&gt;mutex);
  return n;
}