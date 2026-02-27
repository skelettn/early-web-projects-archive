<style>
.center{display: block; margin-left: auto; margin-right: auto;}.modal-body,.modal-footer,.modal-content{background-color: white !important; color: black !important;}
</style>
	<form action="" method="post">
		<button class="btn btn-primary btn-round btn-sm" data-target="#modalAddLink" data-toggle="modal" type="button">Ajouter un lien</button>
		<div aria-hidden="true" aria-labelledby="modalAddLink" class="modal fade" id="modalAddLink" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body" style="text-align:center;">
						<h6>Nom du lien</h6>
                        <input class="form-control" name="link_title" type="text"placeholder="Nom du lien">
						<hr>
						<h6>Adresse de redirection</h6>
                        <input class="form-control" name="link_redirection" placeholder="http://votresite.com" type="text" value="http://">
						<hr>
						<h6>Theme du button</h6>
                        <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1" name="link_theme">
							<option value="themebase">
								Button de base
							</option>
							<option value="themeblack">
								Button noir
							</option>
							<option value="themeblue">
								Button bleu
							</option>
							<option value="themegreen">
								Button vert
							</option>
							<option value="themeyellow">
								Button jaune
							</option>
							<option value="themered">
								Button rouge
							</option>
							<option value="themepurple">
								Button violet
							</option>
						</select>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary btn-round btn-sm pull-right" data-dismiss="modal" type="button">ANNULER</button>&nbsp;&nbsp;
                        <button class="btn btn-primary btn-round btn-sm pull-right" type="submit" name="add_link">CREER</button>
					</div>
				</div>
			</div>
		</div>
	</form>