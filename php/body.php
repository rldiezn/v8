<div class="body">
	<div id="cont-caja">
		<div id="caja-img" class="float"> <img src="images/vocho-ico.png"/> </div>
		<div id="caja-md"  class="float">
			<input id="inpModelo" name="inpModelo" class="inp-Mod" placeholder="Busca tu Modelo"/>
		</div>
		<div id="caja-fle" class="float"><img src="images/flecha-ico.png"/></div>
	</div>

	<div id="cont-list-modelo">
		<ul>
			<li>
				<a href="#modal3" class="nomModeloClic" id="Modelo 70" > Modelo 70 </a>
			</li>
			<li>
				<a href="#modal3" class="nomModeloClic" id="Modelo 75"> Modelo 75 </a>
			</li>
			<li>
				<a href="#modal3" class="nomModeloClic" id="Modelo 90"> Modelo 90 </a>
			</li>
			<li>
				<a href="#modal3" class="nomModeloClic" id="Modelo 95"> Modelo 95 </a>
			</li>
		</ul>
	</div>


	
	<div id="modal3" class="modalmask">
		<div class="modalbox slideUp">
			<a href="#close" title="Close" class="close">X</a>
			<h2><img src="images/vocho-ico.png"/> Datos Vocho</h2>
			<form id="form" name="form" action="list.php" method="post" enctype="multipart/form-data"> 
				<div class="form">

					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpNombreModelo" name="inpNombreModelo" type="text" class="form-text" maxlength="50" placeholder="Anio/Modelo"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpKm" name="inpKm" type="text" class="form-text" maxlength="10" placeholder="Kilometros"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpColor" name="inpColor" type="text" class="form-text"  maxlength="20" placeholder="Color"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpRevision" name="inpRevision" type="text" class="form-text" maxlength="10" placeholder="Ultima Revision"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpDesc" name="inpDesc" type="text" class="form-text" maxlength="300" placeholder="Descripcion"/></div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpPrecio" name="inpPrecio" type="text" class="form-text" maxlength="20" placeholder="Cantidad/Precio"/></div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float upload"> <input id="inpFoto" name="inpFoto" type="file"  placeholder="Foto Vocho"/></div>
					</div>
					<br><br><br>

					<div class="cont-form">
						<div class="boton-sig float"> <a href="#modal4"> Siguiente </a> </div>
					</div>
					<br><br><br>
				</div>
			</form>	
		</div>
	</div>

	<div id="modal4" class="modalmask">
		<div class="modalbox rotate">
			<a href="#close" title="Close" class="close">X</a>
			<h2><img src="images/vocho-ico.png"/> Datos Personales</h2>
			<form id="form" name="form" action="list.php" method="post" enctype="multipart/form-data"> 
				<div class="form">
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpNombre" name="inpNombre" type="text" class="form-text" maxlength="50" placeholder="Nombre"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpCorreo" name="inpCorreo" type="text" class="form-text" maxlength="50" placeholder="Correo"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpTelefono" name="inpTelefono" type="text" class="form-text"  maxlength="20" placeholder="Tlf. Conatcto"/> </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div class="cont-form-ico float"><img src="images/vocho-ico.png"/></div>
						<div class="cont-form-compo float"> <input id="inpAcepta" name="inpAcepta" type="checkbox"/> Acepta </div>
					</div>
					<br><br><br>
					<div class="cont-form">
						<div id="btFinalizar" class="boton-final float"> <a href="#modal5"> Finalizar </a>  </div>
					</div>
					<br><br><br>
				</div>
			</form>	
		</div>
	</div>

	<div id="modal5" class="modalmask">
		<div class="modalbox rotate">
			<a href="#close" title="Close" class="close">X</a>
			<h2><img src="images/vocho-ico.png"/> Confirmaci&oacute;n</h2>
			<p>Datos Almacenados Exitosamente</p>
			<p>Nos Comunicaremos lo mas pronto posible con usted.</p>
		
		</div>
	</div>


</div>
<div id="resul">
		
</div>