<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">My Account</h2>
    </div>
</div>

<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="row">
                <div class="account-top heading col-md-4 col-md-offset-2">
                    <h3>About me</h3>
                </div>
                <div class="col-md-1 col-md-offset-2">
                    <button class="submit-button" id="editAccountButton">Edit</button>
                </div>
                <div class="col-md-1">
                    <button class="delete-button" data-toggle="modal" data-target="#deleteConfirmationModal">Delete</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-2 top15"><?php
                echo "<ul class='about-list'>
                          <li><b>Username: </b>$username</li>
                          <li><b>Name: </b>$firstName $lastName</li>
                          <li><b>Email: </b>$email</li>
                          <li><b>Registration date: </b>$registrationDate</li>
                      </ul>"
                ?></div>
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirmationModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">A you sure?</h4>
            </div>
            <div class="modal-body">
                <p>You are going to delete this account forever</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="delete-button" data-dismiss="modal">Close</button>
                <button type="button" id="deleteAccountButton" class="submit-button">Delete</button>
            </div>
        </div>

    </div>
</div>

<script>
    var editAccountButton = $('#editAccountButton');
    var deleteAccountButton = $('#deleteAccountButton');
    $(editAccountButton).on('click', function () {
        $.ajax(
            {
                type: 'GET',
                url: 'account/edit',
                success: function (data) {
                    console.log(data);
                    window.open('account/edit', '_self');
                    window.innerHTML = data;
                }
            }
        );
    });
    $(deleteAccountButton).on('click', function () {
        $.ajax(
            {
                type: 'POST',
                url: 'account/delete',
                success: function (data) {
                    console.log(data);
                    window.open('account/delete', '_self');
                    window.innerHTML = data;
                }
            }
        );
    });
</script>