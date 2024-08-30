@props(['url'])
<tr>
    <td class="header" style="background-color: #007bff; padding: 20px; text-align: center;">
        <a href="{{ $url }}" style="color: #ffffff; text-decoration: none; font-size: 24px; font-weight: bold;">
            {{ $slot }}
        </a>
    </td>
</tr>
