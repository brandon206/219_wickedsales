import React from 'react';
import { Route } from 'react-router-dom';
import ProductList from './product_list';
import ProductDetails from './product_details';

export default props => {

    return (
        <div>
            <Route path="/products" exact component={ProductList}/>
            <Route path="/products/:product_id" component={ProductDetails}/>
        </div>
    );
}
