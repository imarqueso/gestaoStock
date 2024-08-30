@props(['url', 'color' => '#007bff'])

<tr>
    <td align="center">
        <a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; background-color: {{ $color }}; color: white; text-decoration: none; border-radius: 5px;">
            {{ $slot }}
        </a>
    </td>
</tr>
