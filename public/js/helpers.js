function calculateSellingPrice(){
    const quantity = document.getElementById('quantity').value;
    const unit_cost = document.getElementById('unit_cost').value;

    if(
        (quantity != null && quantity != undefined && quantity > 0) &&
        (unit_cost != null && unit_cost != undefined && unit_cost > 0)
    ){
        const profit_margin = 0.25;
        const shipping_cost = 10;
    
        let selling_price = ((quantity * unit_cost) / (1 - profit_margin)) + shipping_cost;   
    
        document.getElementById('selling_price').value = selling_price.toFixed(2);
    }

}