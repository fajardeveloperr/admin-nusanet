<table class="table app-table-hover mb-0 text-left">
    <thead>
        <tr>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Customer ID</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Name</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Class</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Email</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Identity Number</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Phone Number</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Company Name</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Company Address</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Company Npwp</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Company Phone_Number</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Company Employees</th>
            <th class="text-black" style="font-weight: bold; background-color:#90EE90;">Detail</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $custome)
            <tr>
                <td>
                    {{ $custome->customer_id }}
                </td>
                <td>
                    {{ $custome->name }}
                </td>
                <td>
                    {{ $custome->address }}
                </td>
                <td>
                    {{ $custome->class }}
                </td>
                <td>
                    {{ $custome->email }}
                </td>
                <td>
                    {{ $custome->identity_number }}
                </td>
                <td>
                    {{ $custome->phone_number }}
                </td>
                <td>
                    {{ $custome->company_name }}
                </td>
                <td>
                    {{ $custome->company_address }}
                </td>
                <td>
                    {{ $custome->company_npwp }}
                </td>
                <td>
                    {{ $custome->company_phone_number }}
                </td>
                <td>
                    {{ $custome->company_employees }}
                </td>
                <td>
                    {{ $custome->reference_id }}
                </td>
                <td>
                    {{ $custome->created_at }}
                </td>
            </tr>
        @empty
            <td>
                <i>Maaf data belum tersedia!</i>
            </td>
        @endforelse
    </tbody>
</table>
