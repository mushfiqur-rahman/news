<nav class="navbar navbar-expand-xl">
    <a class="navbar-brand" href="?p=home"></a>
    <button type="button"  class="navbar-toggler" style=" border: 1px solid black;" data-toggle="collapse" data-target="#myMenu"><i class="fas fa-home fa-xs"></i>
        <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse " id="myMenu">
        <div class="navbar-nav mr-auto text-center menu-left" >
			<li class="nav-item"><a class="nav-link" href="?p=home">Home</a></li>
			<?php
			$cn = mysqli_connect("localhost", "root", "", "dbus_002");
			$sql = "select id, name from category where categoryId = 0";
			$table = mysqli_query($cn, $sql);
			while($row = mysqli_fetch_assoc($table))
			{
				print '<li class="nav-item"><a class="nav-link" href="?c=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
				findChild($row["id"]);	
				print '</li>';
			}
	
			function findChild($pid)
			{
				global $cn;
				$sql = "select id, name from category where categoryId = ".$pid;
				$table = mysqli_query($cn, $sql);
				if(mysqli_num_rows($table) > 0)
				{
				print '<ul>';
				while($row = mysqli_fetch_assoc($table))
				{
					print '<li class="nav-item"><a class="nav-link" href="?c=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
					findChild($row["id"]);	
					print '</li>';
				}
				print '</ul>';
				}
			}	
	
	if(isset($_SESSION['type']))
	{
		print '<li class="nav-item"><a class="nav-link" href="?p=users">Users</a></li>
			<li class="nav-item"><a class="nav-link" href="?p=category">Category</a></li>
			<li class="nav-item"><a class="nav-link" href="?p=pages">Pages</a></li>
			<li class="nav-item"><a class="nav-link" href="?p=image">Image</a></li>
			<li class="nav-item"><a class="nav-link" href="?p=file">File</a></li>
			<li class="nav-item"><a class="nav-link" href="?p=myaccount">'.$_SESSION['name'].'</a></li>
			<li class="nav-item"><a class="nav-link" href="?c=logout">Logout</a></li>';
	}
	else{
		print '
			<li class="nav-item"><a class="nav-link" href="?c=register">Register</a></li>
			<li class="nav-item"><a class="nav-link" href="?c=login">Login</a></li>';
	}
	
			?>
        </div>
    </div>
    <ul class="navbar-nav text-center menu-right">
        <li class="nav-item">
            <a class="nav-link" data-target="#myModal" data-toggle="modal"  href="#">
                <i class="fa fa-search" ></i></a>
        </li>
    </ul>
</nav>

<!--MODAL-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search?">
                    <span class="input-group-btn">
                             <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    <span class="input-group-btn close" type="button"  data-dismiss="modal">
                             <button class="btn btn-secondary" type="button"><span aria-hidden="true">&times;</span></button>
                        </span>
                </div>
            </div>
        </div>
    </div>
</div>