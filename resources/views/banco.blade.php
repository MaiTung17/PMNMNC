<table border="1" cellpadding="10">
@for($i = 0; $i < $n; $i++)
    <tr>
        @for($j = 0; $j < $n; $j++)
            <td width="40" height="40"
                style="background-color: {{ ($i+$j)%2==0 ? '#fff' : '#000' }}">
            </td>
        @endfor
    </tr>
@endfor
</table>
