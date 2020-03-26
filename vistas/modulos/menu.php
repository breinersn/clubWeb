<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<?php

			if($_SESSION["perfil"] == "Administrador"){

			echo '

				<li>

					<a href="usuarios">

						<i class="fa fa-user-secret"></i>
						<span>Administradores</span>

					</a>

				</li>';

			}

			?>


			<li>

				<a href="lideres">

					<i class="fa fa-user"></i>
					<span>Lideres</span>

				</a>

			</li>

			<li>

				<a href="usuarios-generales">

					<i class="fa fa-users"></i>
					<span>Todos los usuarios</span>

				</a>

			</li>

			<li>

				<a href="transportadores">

					<i class="fa fa-user-plus"></i>
					<span>Transportadores</span>

				</a>

			</li>

			<li>

				<a href="speedys">
							
					<i class="fa fa-motorcycle"></i>
					<span>Moto Speedys</span>

				</a>

			</li>
			
			<li>

				<a href="carrospeedys">
							
					<i class="fa fa-car"></i>
					<span>Carro Speedy</span>

				</a>

			</li>

			<li>

				<a href="reportes">
							
					<i class="fa fa-edit"></i>
					<span>Reportes</span>

				</a>

			</li>


			<!-- <li class="treeview">

				<a href="#">

					<i class="fa fa-medkit"></i>
					<span>Oferta medica</span>

					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="especialidades">
							
							<i class="fa fa-heartbeat"></i>
							<span>Administrar especialidades</span>

						</a>

					</li>

					<li>

						<a href="especialistas">
							
							<i class="fa fa-user-md"></i>
							<span>Administrar especialistas</span>

						</a>

					</li>

				</ul>

			</li>
 -->
	 </section>

</aside>