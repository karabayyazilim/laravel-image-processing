<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/main.css')}}">
    <link rel="shortcut icon" href="https://www.karabayyazilim.com/uploads/settings/site-image-2020-06-23-150256.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Karabay Yazılım İmage Processing</title>
</head>
<body>

<h1 class="mt-5">Karabay Yazılım İmage Processing</h1>

<form action="{{route('image.post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-file-container mt-2">
        <input name="image[]" multiple class="input-file" id="my-file" type="file">
        <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
    </div>
    <input class="btn btn-primary btn-block mt-5" type="submit" value="Submit">
    <p class="file-return"></p>
</form>

<p class="txtcenter copy">by <a href="https://twitter.com/karabayyazilim">@karabayyazilim</a><br />see also <a href="https://www.karabayyazilim.com">Karabay YAzılım</a></p>


<script src="{{asset('assets/main.js')}}"></script>

</body>
</html>

