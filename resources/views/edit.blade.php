<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Application de saisie de carte étudiant pour ENC  </title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  </head>
  <body>
    <div class="container">
      <h2>Modification de la demande</h2><br  />
        <form method="post" action="{{action('CarteEncController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" value="{{$carteEtudiant->nomEtudiant}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{$carteEtudiant->email}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Numero téléphone:</label>
              <input type="text" class="form-control" name="number" value="{{$carteEtudiant->numeroTelephone}}">
            </div>
          </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md4">
                <label>Section:</label>
                <SELECT name="section">
                    <option value="SIOSLAM"> SIO SLAM</option>
                    <option value="SIOSISR"> SIO SISR</option>
                    <option value="AM"> BTS AM</option>
                </SELECT>
            </div>

        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
