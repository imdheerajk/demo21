


<form method="POST" action="alluser">
    {!! csrf_field()  !!}
<table>
    <tr>
        <td colspan="2" align="center">Register</td>
    </tr>
    <tr>
        <td>Name</td><td><input type="text" name="name"> </td>
    </tr>
    <tr>
        <td>Email</td><td><input type="email" name="email"> </td>
    </tr>
    <tr>
        <td>Password</td><td><input type="password" name="password"> </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Register"/></td>
    </tr>
</table>
</form>