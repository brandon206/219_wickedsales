import React, { Component } from 'react';
import axios from 'axios';
import ProductItem from './product_item';

class ProductList extends Component {
    constructor(props){
        super(props);

        this.state = {
            products: []
        };
    }

    componentDidMount(){
        this.getProducts();
    }

    getProducts(){
        // change
        axios.get('/api/getproducts.php').then((resp) => {

            this.setState({
                products: resp.data.products
            });
        });
    }

    render(){
        const productList = this.state.products.map((product) => {
            return <ProductItem key={product.id} {...product}/>;
        });

        return (
            <div className="product-list">
                <h1 className="center">Wicked Product List</h1>
                <ul className="collection">
                    {productList}
                </ul>
            </div>
        );
    }
}

export default ProductList;
