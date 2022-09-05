<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Nusanet')
<img src="https://rega.nusa.net.id/vendors/images/logo-nusanet.png" class="logo" alt="Nusanet">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

