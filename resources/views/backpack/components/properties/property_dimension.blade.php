<nav class="navbar navbar-light bg-light mt-3">
    <div class="navbar-brand font-weight-600">Property Dimension</div>
  </nav>
  <table class="table table-bordered mt-3">
    <tbody>
      <tr>
        <th class="th font-weight-600" scope="col"></th>
        <th class="th font-weight-600" scope="col">Width</th>
        <th class="th font-weight-600" scope="col">Length</th>
        <th class="th font-weight-600" scope="col">Totla Size</th>
      </tr>
    </tbody>
    <tbody>
      <tr>
        <th class="th font-weight-600" scope="row">Land</th>
        <td class="th font-weight-600">{{ $entry->land_width }}</td>
        <td class="th font-weight-600">{{ $entry->land_length }}</td>
        <td class="th font-weight-600">{{ $entry->land_area }}</td>
      </tr>
      <tr>
        <th class="th font-weight-600" scope="row">Building</th>
        <td class="th font-weight-600">17</td>
        <td class="th font-weight-600">38</td>
        <td class="th font-weight-600">1</td>
      </tr>
    </tbody>
  </table>