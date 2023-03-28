<!DOCTYPE html>
<html>
  <head>
    <title>Invoice</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      
      #invoice {
        margin: 0 auto;
        width: 800px;
        border: 1px solid #ccc;
        padding: 20px;
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
      }
      
      table td, table th {
        border: 1px solid #ccc;
        padding: 10px;
      }
      
      table th {
        text-align: left;
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
    <div id="invoice">
      <h1>Invoice</h1>
      <p>Invoice Number: {{$order->id}}</p>
      <p>Date {{$order->updated_at}}</p>
      
      <h2>Billing Information</h2>
      <p>Name: {{$order->first_name}} {{$order->last_name}}</p>
      <p>Email:  {{$order->email}}</p>
      <p>Address:  {{$order->street_address}}</p>
      
      <h2>Payment Information</h2>
      <p>Payment Method: Cash On Delivery</p>
      
      <h2>Order Summary</h2>
      <table>
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td> {{$order->product_title}}</td>
            <td> {{$order->product_quantity}}</td>
            <td> {{$order->product_price}}</td>
            <td> {{$order->product_quantity * $order->product_price}}</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: right;">Subtotal:</td>
            <td>{{$order->product_quantity * $order->product_price}}</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: right;">Delivery Charge:</td>
            <td>$60</td>
          </tr>
          <tr>
            <td colspan="3" style="text-align: right;">Total:</td>
            <td>{{$order->product_quantity * $order->product_price + 60}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
