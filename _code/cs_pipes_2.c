#include &lt;stdio.h&gt;
#include &lt;unistd.h&gt;
#include &lt;sys/types.h&gt;

#define IN 0
#define OUT 1

int main(void)
{
  char string[] = "Hello, world!\n";
  char readbuffer[80];

  // Creates the pipe using the integer array of size two.
  int fd[2];
  pipe(fd);

  // Fork new process
  if(fork() == 0)
  {
    // Close read end of pipe.
    close( fd[IN] );
    // Child Process: Send "string" through the output side of pipe.
    write( fd[OUT], string, (strlen(string)+1) );
    exit(0);
  }
  else
  {
    // Clise write end of pipe.
    close( fd[OUT] );
    // Parent Process: Read string from the read side of pipe.
    read( fd[IN], readbuffer, sizeof(readbuffer) );
    printf("Received string: %s", readbuffer);
  }
  return(0);
}