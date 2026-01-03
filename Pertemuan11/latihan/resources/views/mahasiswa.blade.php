<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blade Template Mahasiswa</title>
</head>
<body>

    <h2>Perulangan FOR (1–10)</h2>
    @for ($i = 1; $i <= 10; $i++)
        {{ $i }} <br>
    @endfor

    <hr>

    <h2>Perulangan WHILE (1–10)</h2>
    @php $i = 1; @endphp
    @while ($i <= 10)
        {{ $i }} <br>
        @php $i++; @endphp
    @endwhile

    <hr>

    <h2>Perulangan FOREACH (Nilai Mahasiswa)</h2>
    @foreach ($nilai as $n)
        {{ $n }} <br>
    @endforeach

</body>
</html>
