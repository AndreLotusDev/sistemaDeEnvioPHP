<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails teste!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<!-- O Action garante que o front seja enviado ao back -->
						<form action="process_submit.php" method="post">
							<div class="form-group">
								<label for="email">Para</label>
								<input name="email" type="text" class="form-control" id="para" placeholder="joao@dominio.com.br">
							</div>

							<div class="form-group">
								<label for="title">Assunto</label>
								<input name="title" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="subject">Mensagem</label>
								<textarea name="subject" class="form-control" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>