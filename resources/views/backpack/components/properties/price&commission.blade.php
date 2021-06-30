<nav class="navbar navbar-light bg-light mt-3">
    <div class="navbar-brand font-weight-600">Price and Commission</div>
  </nav>
  <div class="table-responsive">
    <table class="table table-bordered mt-3 text-nowrap">
      <tbody>
        <tr>
          <td rowspan="2" class="text-center">Type</td>
          <td colspan="2">Asking Price</td>
          <td colspan="2">Negotiable Price</td>
          <td colspan="2">Listing Price</td>
          <td colspan="2">Sold/Rented</td>
          <td>Commission</td>
        </tr>
        <tr>
          <td class="td">Total</td>
          <td class="td">Per Sqm</td>
          <td class="td">Total</td>
          <td class="td">Per Sqm</td>
          <td class="td">Total</td>
          <td class="td">Per Sqm</td>
          <td class="td">Total</td>
          <td class="td">Per Sqm</td>
          <td class="td">Total</td>
        </tr>
        <tr>
          <td scope="row">Sale</td>
          <td class="td">${{ number_format($entry->sale_price_asking, 2)}}</td>
          <td class="td">${{ number_format($entry->sale_asking_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->sale_price, 2) }}</td>
          <td class="td">${{ number_format($entry->sale_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->sale_list_price, 2) }}</td>
          <td class="td">${{ number_format($entry->sale_listing_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->sold_price, 2) }}</td>
          <td class="td">${{ number_format($entry->sold_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->sale_commission, 2) }}</td>
        </tr>
        <tr>
          <td scope="row">Rent</td>
          <td class="td">${{ number_format($entry->rent_price_asking, 2) }}</td>
          <td class="td">${{ number_format($entry->rent_asking_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->rent_price, 2) }}</td>
          <td class="td">${{ number_format($entry->rent_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->rent_list_price, 2) }}</td>
          <td class="td">${{ number_format($entry->rent_listing_price_per_sqm, 2)}}</td>
          <td class="td">${{ number_format($entry->rented_price, 2) }}</td>
          <td class="td">${{ number_format($entry->rented_price_per_sqm, 2) }}</td>
          <td class="td">${{ number_format($entry->rental_commission, 2) }}</td>
        </tr>
      </tbody>
    </table>
  </div>