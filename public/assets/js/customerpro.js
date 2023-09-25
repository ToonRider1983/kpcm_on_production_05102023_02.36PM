function fetchCustomer() {
    const customerId = document.getElementById('customer_id').value;
    axios.get('/customerpro/fetchCustomer?customer_id=' + customerId)
        .then(response => {
            const customerData = response.data;
            document.getElementById('customer_id').value = customerData.customer_id;
            document.getElementById('customers_id').value = customerData.customer_name;
        })
        .catch(error => {
            console.error(error);
            document.getElementById('customer_id').value = null;
            document.getElementById('customers_id').value = null;
        });
}
