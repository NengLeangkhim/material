



    <div class="">
            @if(count($dataController) <= 0)
                <div class="col-12 text-center font-weight-bold" >No child available !</div>
                <?php return 0;?>
            @endif

            <table class="table table-bordered table-hover" width="80%;">
                <thead>
                        <th>#</th>
                        <th>Task Name</th>
                        <th>Start Date</th>
                        <th>Dateline</th>
                        <th>Create Date</th>
                        <th>Create By</th>
                        <th>Task Description</th>


                </thead>
                <tbody>

                    @foreach ($dataController as $key=>$val)
                            <?php
                                $date = date_create($val->create_date);
                                $create_date = date_format($date, 'Y-M-d H:i:s A');
                            ?>
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->date_from }}</td>
                                <td>{{ $val->date_to }}</td>
                                <td>{{ $create_date }}</td>
                                <td> {{ $val->first_name_en.' '.$val->last_name_en }}</td>
                                <td> {{ $val->task}}</td>

                            </tr>

                    @endforeach


                </tbody>

            </table>


    </div>
