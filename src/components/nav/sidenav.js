import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Sidenav extends Component {
    componentDidMount(){
        M.Sidenav.init(this.sidenav);
    }

    render(){
        return (
            <ul ref={(e) => { this.sidenav = e }} id="sidenav" className="sidenav">
                {this.props.links}
            </ul>
        );
    }
}

export default Sidenav;
