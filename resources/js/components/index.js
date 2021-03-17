import React, { Component } from 'react' ;
import ReactDOM from 'react-dom';

export default class UserList extends Component {
  render() {
      return (
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-md-8">
              <div className="card">
                <div className="card-header">Welcome</div>

                <div className="card-body">Hi! I'm an example Component</div>
              </div>
            </div>
          </div>
        </div>
      );
  }
}

if (document.getElementById('userlist')){
    ReactDOM.render(<UserList />, document.getElementById('userlist'));
}