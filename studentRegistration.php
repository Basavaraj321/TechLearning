<form id="stuRegForm">
        <div class="mb-3">
                <label for="stuname" class="form-label"><i class="fas fa-user"></i>  <b>Full Name</b></label><small id=statusMsg1></small>
                <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Your Name">
            </div>
            <div class="mb-3">
                <label for="stuemail" class="form-label"><i class="fas fa-envelope"></i>  <b>Email</b></label><small id=statusMsg2></small>
                <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Email ID">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="col-md-3">
                <label for="stuclass" class="form-label"><i class="fas fa-user-graduate"></i> <b>Class</b></label><small id=statusMsg3></small>
                <select class="form-select" id="stuclass" required>
                    <option selected disabled value="">Class..</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <!--
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    -->
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div><br>
            </div>
            <!-- <div class="mb-3">
                <label for="stupass" class="form-label"><i class="fas fa-key"></i>  <b>New Password</b></label><small id=statusMsg4></small>
                <input type="password" class="form-control" id="stupass" name="stupass" placeholder="Password">
            </div> -->
        </form>