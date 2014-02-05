<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("../php/mainCSS.php");
		require_once("../php/articleCSS_JS.php");
	?>
	<title>Pipes and Processes</title>
</head>
<body>
	<?php
		require_once("../php/social/fbJS.php");
		require_once("../php/header.php");
		require_once("../php/nav.php");
	?>

	<div class="banner" style="background-image: url(http://learncodeart.com/_images/patterns/pipes.png);"></div>

	<article class="main">
		
		<nav class="outline float">
			<section>
				<h2>Outline</h2>
				<ul>
					<a href="#intro"><li>Intro</li></a>
					<a href="#fd"><li>File Descriptors</li></a>
					<a href="#pipes"><li>Pipes</li></a>
					<a href="#close"><li>Close command</li></a>
					<a href="#dup"><li>Dup Command</li></a>
					<a href="#notes"><li>Notes</li></a>
					<a href="#disqus_thread"><li>Comments</li></a>
				</ul>
			</section>
		</nav>

		<div class="content">

			<header>
				<h1>CS: Pipes and Processes</h1>
				<p><time pubdate datetime="2014-02-04">Created on: February 4, 2014</time></p>
				<section class="social">
					<?php
						include("../php/social/fbLike.php");
						include("../php/social/twitter.php");
					?>
				</section>
			</header>
			
			<section id="intro">
				<header>
					<h2>Intro</h2>
					<a href="#intro"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
			
				<p>
					Understanding file descriptors, pipes and how to manipulate them can be difficult. The purpose of this article is to provide some basic understanding of how pipes work and all the concepts that go along with them. This article is by no means a comprehensive coverage of pipes; instead it aims to give some basic knowledge and provide a mental picture of how all the parts fit together. Please feel free to visit all of the links in this article as they speak in greater detail about all the specifics of the functions and concepts discussed here.
				</p>
			</section>
	
			<section id="fd">
				<header>
					<h2>File Descriptors</h2>
					<a href="#fd"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
	
				<p>
					A <em>file descriptor</em> is an indicator that points to an input/output device. In other words a file descriptors is a pointer to an input/output device. These pointers can be modified, copied, created and closed.
				<br>
				<br>
					For example, when a new process is created by default it contains three file descriptors: <em>stdin</em>, <em>stdout</em>, <em>stderr</em>. <em>Stdout</em> and <em>stderr</em> are write only file descriptors while <em>stdin</em> is read only. These three file descriptors all point to the terminal, meaning that any input or output will come from or be written to the terminal. What exactly are these file descriptors? They are represented by integers. By default <em>stdin</em> is equal to <em>0</em>, <em>stdout</em> to <em>1</em>, and <em>stderr</em> to <em>2</em>. We are not however, limited to these three. The next section will explain how to create new ones using pipes.
				<br>
				<br>
					Now that we know what a file descriptor is, lets examine where it’s stored. Each process has a table called the <em>File Table</em>. This table stores all of the available <em>file descriptors</em> and the <em>pointer</em> to the input/output device. When a process wants to access one of these devices all it needs to do is reference the <em>file descriptor</em>. The kernel will then look at the <em>file table</em> inside of the process and get the pointer to the input/output device that is associated with the <em>file descriptor</em>.
				</p>

				<img src="http://learncodeart.com/_images/article_src/fd_dgm.png">

				<p>
					The image above shows how a process might have more than three <em>files descriptors</em>. In this case the <em>file descriptors</em> <em>3</em> and <em>4</em> are pointing to text files. Every time that the <i>fopen()</i> function is used this is what happens, a new file descriptor is created that is pointing to the file that is being written to or read from.
				</p>

				<p class="notes">
					Sources: <a href="http://chinkisingh.com/2012/05/04/file-descriptor-manipulation-in-unix/">http://chinkisingh.com/2012/05/04/file-descriptor-manipulation-in-unix/</a>
				</p>
			</section>
		
			<section id="pipes">
				<header>
					<h2>Pipes</h2>
					<a href="#pipes"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					The concept of a <em>pipe</em> builds on the <em>file descriptors</em>. Sometimes it is necessary to create a channel (pipe) of communication between two processes. The way this is done is by creating two new file descriptors that point to a pipe. The figure below gives a visual representation of what a pipe would look like in the context of file descriptors.
				</p>

				<img src="http://learncodeart.com/_images/article_src/pipe_dgm.png">

				<p>
					Notice that the pipe has two sides, one where the process writes to and the other where the process reads from. Therefore a pipe is just a way to move information from one point to another without having to involve files or other devices. This makes it easier for two processes to communicate each other.
				<br>
				<br>
					Keep in mind that a file descriptor to a pipe can be treated like a file pointer. Which means that you can use the <em>write()</em> and <em>read()</em> methods on it. The following example shows how to initialize and test a pipe:
				</p>

				<pre data-highlight="13,14,15"><?php include("http://learncodeart.com/_code/cs_pipes_1.c"); ?></pre>

				<p>
					As mentioned earlier a file descriptor is stored in the way of an integer. So when a pipe is created an integer array of size two is needed. By convention the integer element at index 0 is the read side and the integer element at index 1 is the read side. It is useful to declare the constants <em>IN</em> and <em>OUT</em> (alternatively STD_IN and STD_OUT) to make reading the code more human readable.
				<br>
				<br>
					The <em>pipe()</em> function is where all the magic happens. This function first creates a new <em>pipe</em> and then finds the two lowest available <em>file descriptors</em> and assigns them to the ends of the pipes. The function returns <i>0</i> when successful and <i>-1</i> when an error occurred. For more information please refer to the man page or this <a href="http://linux.die.net/man/2/pipe">site</a>. Alternatively this <a hre="http://linux.die.net/man/7/pipe">site</a> offers a more in depth discussion on pipes.
				<br>
				<br>
					There is something very important left out of this example that will be discussed in the next section. That being said, the above code shows how to go about creating a pipe between two processes and demonstrates that a pipe acts as any other input/output method, so it can be treated the same way a file pointer or an output to the terminal would be treated.
				</p>

				<p class="notes">
					Code example was adapted from this site: <a href="http://www.tldp.org/LDP/lpg/node11.html">http://www.tldp.org/LDP/lpg/node11.html</a>
					<br>
					Sources: <a href="http://linux.die.net/man/2/pipe">http://linux.die.net/man/2/pipe</a>, <a href="http://linux.die.net/man/7/pipe">http://linux.die.net/man/7/pipe</a>
				</p>
			</section>
	
			<section id="close">
				<header>
					<h2>Close Command</h2>
					<a href="#close"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>

				<p>
					In the previous section the code example that was shown was missing something very important. That something is the <em>close()</em> function. To understand why this function is needed lets have a little recap on what happens when a process is forked. 
				<br>
				<br>
					When the <em>fork()</em> function is called a new process is created by copying the state of the current process. The <i>child</i> process therefore inherits everything from the <i>parent</i>, including any <em>file descriptors</em>. Also worth noting is that the kernel keeps track of which file descriptors have an open connection to <i>all devices</i>. Meaning that if the parent process creates a new pipe and then forks a child process the kernel will know that both the child and parent have an open connection to the pipe. The following image represents the file table of the parent and child processes after the fork in the code example from the previous section:
				</p>

				<img src="http://learncodeart.com/_images/article_src/fork_dgm.png">

				<p>
					After the fork, the <em>file table</em> is duplicated in the new child node along with the <em>file descriptors</em> and their pointers. Now, suppose that the child node was only interested in writing to the pipe and the parent process was only interested in reading from the pipe.The child process will therefore have no need for the read end (<em>fd3</em>) of the pipe, and the parent process will have no need for the write end of the pipe (<em>fd4</em>). In addition to the parent process not needing access to <em>fd4</em> there will also be another problem. Suppose that the child node creates some message and writes it to the pipe. Upon doing this it closes all of the file descriptors and exits. The parent process can now read from the pipe. The problem however is that the kernel will never send an <i>EOF</i> character through the pipe until all pointers to the write end of the pipe have being closed. Since the kernel is aware that the parent process still has a connection to the write end of the pipe it will not send an <i>EOF</i> character and the parent process will not know when the message has ended.
				<br>
				<br>
					This is why we need the <em>close()</em> function. After the parent has forked the child process it should close the write end of the pipe. Doing this will ensure that as soon as the child process ends the kernel will send an <i>EOF</i> character through the pipe letting the parent process know that nothing more will be sent through the pipe. Similarly, the child process should close the read end of the pipe. The following image shows what the <em>file descriptors</em> will look after closing the unnecessary pointers:
				</p>

				<img src="http://learncodeart.com/_images/article_src/fork_close_dgm.png">

				<p>
					As a general practice any file descriptor that will not longer be used should be closed. For a more detailed description of what the close function does visit this <a href="http://pubs.opengroup.org/onlinepubs/009695399/functions/close.html">site</a>. To fix the code example in the previous section we must add two calls to the <em>close</em> function as demonstrated below:
				</p>

				<pre data-highlight="21,29"><?php include("http://learncodeart.com/_code/cs_pipes_2.c") ?></pre>

				<p class="notes">
					Sources: <a href="http://pubs.opengroup.org/onlinepubs/009695399/functions/close.html">http://pubs.opengroup.org/onlinepubs/009695399/functions/close.html</a>, <a href="http://www.tldp.org/LDP/lpg/node10.html">http://www.tldp.org/LDP/lpg/node10.html</a>
				</p>
			</section>
	
			<section id="dup">
				<header>
					<h2>Dup Command</h2>
					<a href="#dup"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>

				<p class="notes">
					The functions <em>dup()</em> and <em>dup2()</em> have similar functionality. To try to keep this article simple this section will focus on <em>dup2()</em> and at the end offer a quick explanation of what <em>dup()</em> does.
				</p>
		
				<p>
					In the first section it was said that a file descriptor could be created, closed, modified and copied. We know how to create and close a file descriptor. Now lets examine how to go about copying and modifying one. For this we will need the <em>dup2()</em> function. This function copies the pointer of one <em>file descriptor</em> to another.
				<br>
				<br>
					In the previous code example the child process wrote directly on the pipe so that the parent process could read it. Suppose now that the child process will execute a different process and we want the output from this executed process to be directed back to the parent process. What the newly executed process needs to do is write its output to the write end of the pipe. The problem however, is that the executed program was created by another person who knew nothing about pipes and it just outputs to terminal. What we need to figure out then is how to redirect the standard output (<em>fd1</em>) to the write end of the pipe (<em>fd4</em>). This is where <em>dup2()</em> comes in.
				<br>
				<br>
					The dup2 function takes two parameters: <em>dup2(fd_old, fd_new)</em>. The pointer of <em>fd_old</em> will replace the pointer of <em>fd_new</em> when the function is called.
				<br>
				<br>
					For example, lets take the code from the previous example and insert the highlighted lines:
				</p>

				<pre data-highlight="20"><?php include("http://learncodeart.com/_code/cs_pipes_3.c") ?></pre>

				<p>
					Right after the fork there is a call to the dup2 function. This call will take the pointer of the write end of the pipe and copy it over to the pointer of the standard out. From now on every time the process writes to standard out the output will go to the pipe instead of the terminal. This is what the file table of both the parent and child process will look like after the call to dup2:
				</p>

				<img src="http://learncodeart.com/_images/article_src/dup_dgm.png">

				<p>
					After the call to <em>dup2</em> there are two calls to close, one on the write end of the pipe and another on the read end. Why would we close both end of the pipe? The reason for this is that after the call to <em>dup2</em>, standard out is pointing to the write end of the pipe. Since the child process is only interested in the standard out, any other pointers will no longer be needed. On the side of the parent process things have not changed. The only call to close is to close the write end of the pipe. This is what the file tables will look like after all the calls to close:
				</p>

				<img src="http://learncodeart.com/_images/article_src/dup_close_dgm.png">

				<p>
					The difference between <em>dup2</em> and <em>dup</em> are the following. For the file descriptor <em>fd_new</em> to be reassigned to the device pointed to by <em>fd_old</em> the file descriptor <em>fd_new</em> first has to be closed. Once <em>fd_new</em> has being closed it can be reassigned to <em>fd_old</em>. The function <em>dup2</em> does all of this automatically, whereas the function <em>dup</em> only assigns fd_old to the lowest available file descriptor. Therefore if we were to use <em>dup</em> we would need to make a call to <em>close(fd_new)</em> before the call to <em>dup</em>. This is a problem because the two operations (close and the dup) are not atomic, and another system call could take place at that same moment disrupting our intended changes. This is why <em>dup2</em> is preferred to <em>dup</em>, because it is atomic.
				</p>

				<p class="notes">
					Sources: <a href="http://chinkisingh.com/2012/07/01/difference-between-dup-and-dup2/">http://chinkisingh.com/2012/07/01/difference-between-dup-and-dup2/</a>, <a href="http://man7.org/linux/man-pages/man2/dup.2.html">http://man7.org/linux/man-pages/man2/dup.2.html</a>, <a href="http://pubs.opengroup.org/onlinepubs/009695399/functions/dup.html">http://pubs.opengroup.org/onlinepubs/009695399/functions/dup.html</a>
				</p>

			</section>
	
			<section id="notes">
				<header>
					<h2>Notes</h2>
					<a href="#notes"><img src="http://learncodeart.com/_images/link20.png"></a>
					<a class="toTop" href="#"><img src="http://learncodeart.com/_images/toTop.png"></a>
				</header>
		
				<p>
					To reiterate what was said in the introduction, this article is not meant to provide a comprehensive coverage of pipes. The aim is to provide the foundations that will later aid in the understanding of more advance techniques. If you find any mistakes (grammar wise or factual) please leave me a comment or contact me by email to <a href="mailto:elmer@vt.edu">elmer@vt.edu</a>.. Hope this article was helpful!
				</p>
			</section>
			
			<section class="social">
				<?php
					include("../php/social/fbLike.php");
					include("../php/social/twitter.php");
				?>
			</section>
			
			<footer>
				<p>
					Written by: Elmer Landaverde <a href="mailto:elmerlandaverde@gmail.com">(elmerlandaverde@gmail.com)</a><br>
					Last updated: February 05, 2014<br>
					<a title="Nerdfighters" href="http://nerdfighters.ning.com/" target="_blank">DFTBA!</a>
				</p>
			</footer>
			<?php require_once("../php/disqus.php"); ?>
		
		</div>
	</article>
</body>
</html>