export function formatMoney(pennies){
    pennies = parseFloat(pennies);

    if(isNaN(pennies)){
        return 'TBA';
    }

    const dollars = (pennies / 100).toFixed(2);

    return `$${dollars}`;
}
