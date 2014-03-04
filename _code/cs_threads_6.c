struct int_pipe {
  bounded_buffer_t buf;
  bool closed;
  pthread_mutex_t mutex;
  pthread_mutex_t avail_data;
};