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
  int error = pipe(fd);
  // Determine if pipe command returned an error.
  if (error == -1) {
    perror("pipe");
    exit(1);
  }

  // Fork new process
  if(fork() == 0)
  {
    // Copy the write end of pipe to standard out.
    dup2( fd[OUT], OUT );
    // Close read and write end of pipe.
    close( fd[IN] );
    close( fd[OUT] );
    // Child Process: execute new process
    char *cmd[] = {"ls", "-la", (char *) 0};
    execvp("ls", cmd);
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