// import React, { Component } from 'react' ;
// import ReactDOM from 'react-dom';

// export default className Example extends Component {
//   render() {
//       render (
//         <div className="container">
//           <div className="row justify-content-center">
//             <div className="col-md-8">
//               <div className="card">
//                 <div className="card-header">Example Component</div>

//                 <div className="card-body">I'm an example Component</div>
//               </div>
//             </div>
//           </div>
//         </div>
//       )
//   }
// }

// if (document.getElementById('example')){
//     ReactDOM.render(<Example />, document.getElementById('example'));
// }

// className App extends Component {

//   constructor(){
//     super();
//     this.state={
//       email:"",
//       password:"",
//     }
//   }
//   submit(){
//     console.log(this.state)
//     fetch('url',{
//       method:'post',
//     })
//   }
//   render(){
//     return(
//       <div className="App">
//       <h1> React and Laravel Tutorial 3 </h1>
//       <input type="text" onChange={(item)=>{this.setState({email:item.target.val()})}}/>
//       <input type="password" onChange={(item)=>{this.setState({password:item.target.val()})}}/>
//       <button onClick={()=>{this.submit()}}> Login</button>
//       </div>
//       );
//   }
// }

// export default App;

import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';
  
class Example extends Component {
  constructor (props) {
    super(props)
    this.state = {
      name: '',
      password: ''
    }
  
    this.onChangeValue = this.onChangeValue.bind(this);
    this.onSubmitButton = this.onSubmitButton.bind(this);
  }
   
    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
  
    onSubmitButton(e) {
        e.preventDefault();
   
        // axios.post('/checklogin', {
        //     'email': this.state.email,
        //     'password': this.state.password
        // })
        // .then(function (response) {
        //     console.log(response);
        //     return response;

        // })
        // .catch(function (error) {
        //     console.log(error);
        // });

        console.log(this.state)
        fetch('/api/samplee',{
          method:'post',
          body:JSON.stringify(
            this.state
          ),
          headers:{
            'Accept':'application/json',
            'Content-Type':'application/json',
          }
        }).then(function(response){
          response.json().then(function(resp){
            console.log(resp)
          })
        })


        this.setState({
            name: '',
            password: ''
        })
    }
   
  componentDidMount () {
  }
   
  render () {
    return (
                            <form  onSubmit={this.onSubmitButton}><br />
                            <h3 className="text-center text-info">Login</h3><br />
                                <label for="username" className="text-info">Username:</label><br />
                                <input type="text" name="email" id="email" class="form-control" value={this.state.email} onChange={this.onChangeValue} />

                                <label for="password" className="text-info">Password:</label><br />
                                <input type="password" name="password" id="password" class="form-control" value={this.state.password} onChange={this.onChangeValue} /><br />

                                
                                <button className="btn btn-info btn-md">Submit</button>
                            </form>
        
    )
  }
}
export default Example;
if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}