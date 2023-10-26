<table datatable="ng" class="table table-bordered table-jabatan">
    <thead class="bg-light" style="font-size: 12px;">
        <tr class="text-center">
            <th>Kode</th>
            <th>Bidang</th>
            <th>
                Aksi
            </th>
        </tr>
    </thead>
    <tbody style="font-size: 12px">
        <tr class="text-center" ng-repeat="row in databidang">
            <td>@{{ row.kode_bidang }}</td>
            <td>@{{ row.keterangan }}</td>
            <td>
                <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                    ng-click="editData(row)" data-toggle="modal" data-target="#myModal"></span>
                <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                    ng-click="delete(row)"></span>
            </td>
        </tr>
    </tbody>
</table>
