<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Modal Header</h2>
        </div>
        <div class="modal-body">
            <form id="loginFrm" method="POST" action="">
            <table id="logTab">
                <tr>
                    <td>
                        <input type="text" class="logInput" name="fuser" required>
                        <input type="password" class="logInput" name="fpass" required>
                    </td>
                    <td>
                        <input type="submit" value="login">
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $msgLog ?></td>
                </tr>
            </table>
            </form>
        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>
</div>