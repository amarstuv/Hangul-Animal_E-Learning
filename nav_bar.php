		<nav class = "navbar navbar-header navbar-light bg-primary">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<p class = "navbar-text pull-right text-white">
						<?php if($_SESSION['role'] == 1): ?>
							<h3>Hangul Learning Administration</h3>
						<?php endif; ?>
						<?php if($_SESSION['role'] == 2): ?>
							<h3>Hangul Animal Learning</h3>
						<?php endif; ?>
					</p>
				</div>
				<div class = "nav navbar-nav navbar-right">
					<?php $Name = $_SESSION['name'];?>
					<a href="logout.php" class="text-dark"><?php echo $Name ?> <i class="fa fa-power-off"></i></a>
				</div>
			</div>
		</nav>
		<div id="sidebar" class="bg-light">
			<div id="sidebar-field">
				<a href="home.php" class="sidebar-item text-dark">
						<div class="sidebar-icon"><i class="fa fa-home"> </i></div>  Home
				</a>
			</div>
		<?php if($_SESSION['role'] == 1): ?>
			<div id="sidebar-field">
				<a href="student.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-users"> </i></div>  Student List
				</a>
			</div>
			<!-- <div id="sidebar-field">
				<a href="manageLesson.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-book"></i></div>  Manage Lesson
				</a>
			</div> -->
			<div id="sidebar-field">
				<a href="quiz.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-list"> </i></div>  Quiz List
				</a>
			</div>
			<!-- <div id="sidebar-field">
				<a href="history.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-history"> </i></div>  Quiz Records
				</a>
			</div> -->
		<?php endif; ?>
		<?php if($_SESSION['role'] == 2): ?>
			<div id="sidebar-field">
				<a href="hangul/homepage.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-book"></i></div>  Lesson
				</a>
			</div>
			<div id="sidebar-field">
				<a href="quiz_student.php" class="sidebar-item text-dark">
					<div class="sidebar-icon"><i class="fa fa-list"> </i></div>  Quiz 
				</a>
			</div>
		<?php endif;?>
		</div>
		<script>
			$(document).ready(function(){
				var loc = window.location.href;
				loc.split('{/}')
				$('#sidebar a').each(function(){
				// console.log(loc.substr(loc.lastIndexOf("/") + 1),$(this).attr('href'))
					if($(this).attr('href') == loc.substr(loc.lastIndexOf("/") + 1)){
						$(this).addClass('active')
					}
				})
			})
			
		</script>