<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Edit Competency Element</h1>
        <form action="'manajement.updateelement', $element->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="criteria">Kriteria</label>
                <input type="text" name="criteria" id="criteria" class="form-control" value="{{ $element->criteria }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ 'manajement.element'}}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

</body>
</html>
