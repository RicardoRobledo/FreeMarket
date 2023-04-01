import React from 'react';

import Menu from '../components/Menu';


export default class CreateUserPage extends React.Component {

  render() {
    return (
      <>
        <Menu />
        <div class="container mt-5">
          <form class="row g-3">
            <div class="col-md-4">
              <label for="validationServer01" class="form-label">Name</label>
              <input type="text" class="form-control is-invalid" id="validationServer01" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServer02" class="form-label">First name</label>
              <input type="text" class="form-control is-invalid" id="validationServer02" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServerUsername" class="form-label">Last name</label>
              <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServer04" class="form-label">Username</label>
              <input type="text" class="form-control is-invalid" id="validationServer03" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServer04" class="form-label">Password</label>
              <input type="password" class="form-control is-invalid" id="validationServer04" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServer05" class="form-label">Confirm password</label>
              <input type="password" class="form-control is-invalid" id="validationServer05" required/>
            </div>
            <div class="col-md-4">
              <label for="validationServer06" class="form-label">Email</label>
              <input type="email" class="form-control is-invalid" id="validationServer06" required/>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
        </div>
      </>
    );
  }

}