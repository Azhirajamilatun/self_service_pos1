<h1>Profile</h1>
<hr>
<table border='0'>
    @if($nama == 'azhira')
    <tr>
        <td> Nama lengkap </td>
        <td> {{$nama}}</td>
</tr>
@endif 
</table>
    <hr> 
    <h1> Ini foreach </h1>
    <table> 
       @foreach($data_array ['nama'] as $page)
       <tr>
            <td>Nama</td>
         <tr> 
         
            <td>Tanggal,lahir</td>
            <td>Alamat</td>
            <td> 
                {{ $page }} </td>
           @endforeach
</table>    









@foreach($data_array['nama'] as $data)
       <tr>
            <td>Nama</td>
            <td>Tanggal,lahir</td>
            <td>Alamat</td>
            <td> 
                {{ $data }} </td>
           @endforeach
</table>    