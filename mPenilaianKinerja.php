<?php
include "Header.php";
error_reporting(0);
?>
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Complex Headers With Column Visibility</h5>
                                <span>Complex headers (using colspan / rowspan) can be used to group columns of similar information in DataTables, creating a very powerful visual effect.
                                    In addition to the basic behaviour, DataTables can also take colspan and rowspans into account when working with hidden columns. The colspan and rowspan attributes for each cell are automatically calculated and rendered on the page for you. This allows the columns.visible option and column().visible() method to take into account rowspan / colspan cells, drawing the header correctly.</span>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive dt-responsive">
                                    <div id="complex-header_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="complex-header_length"><label>Show <select name="complex-header_length" aria-controls="complex-header" class="form-control input-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6">
                                                <div id="complex-header_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="complex-header"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="complex-header" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="complex-header_info" style="width: 977px;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th rowspan="2" class="sorting_asc" tabindex="0" aria-controls="complex-header" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 178px;">Name</th>
                                                            <th colspan="2" rowspan="1">HR Information</th>
                                                            <th colspan="2" rowspan="1">Contact</th>
                                                        </tr>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="complex-header" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 270px;">Position</th>
                                                            <th class="sorting" tabindex="0" aria-controls="complex-header" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 129px;">Salary</th>
                                                            <th class="sorting" tabindex="0" aria-controls="complex-header" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 79px;">Office</th>
                                                            <th class="sorting" tabindex="0" aria-controls="complex-header" rowspan="1" colspan="1" aria-label="Extn.: activate to sort column ascending" style="width: 107px;">Extn.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">Airi Satou</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>33</td>
                                                            <td>2008/11/28</td>

                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">Ashton Cox</td>
                                                            <td>Junior Technical Author</td>
                                                            <td>San Francisco</td>
                                                            <td>66</td>
                                                            <td>2009/01/12</td>

                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">Bradley Greer</td>
                                                            <td>Software Engineer</td>
                                                            <td>London</td>
                                                            <td>41</td>
                                                            <td>2012/10/13</td>

                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">Brielle Williamson</td>
                                                            <td>Integration Specialist</td>
                                                            <td>New York</td>
                                                            <td>61</td>
                                                            <td>2012/12/02</td>

                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">Cedric Kelly</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>Edinburgh</td>
                                                            <td>22</td>
                                                            <td>2012/03/29</td>

                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">Charde Marshall</td>
                                                            <td>Regional Director</td>
                                                            <td>San Francisco</td>
                                                            <td>36</td>
                                                            <td>2008/10/16</td>

                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">Colleen Hurst</td>
                                                            <td>Javascript Developer</td>
                                                            <td>San Francisco</td>
                                                            <td>39</td>
                                                            <td>2009/09/15</td>

                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">Dai Rios</td>
                                                            <td>Personnel Lead</td>
                                                            <td>Edinburgh</td>
                                                            <td>35</td>
                                                            <td>2012/09/26</td>

                                                        </tr>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">Garrett Winters</td>
                                                            <td>Accountant</td>
                                                            <td>Tokyo</td>
                                                            <td>63</td>
                                                            <td>2011/07/25</td>

                                                        </tr>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1">Gloria Little</td>
                                                            <td>Systems Administrator</td>
                                                            <td>New York</td>
                                                            <td>59</td>
                                                            <td>2009/04/10</td>

                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">Name</th>
                                                            <th rowspan="1" colspan="1">Position</th>
                                                            <th rowspan="1" colspan="1">Salary</th>
                                                            <th rowspan="1" colspan="1">Office</th>
                                                            <th rowspan="1" colspan="1">Extn.</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="complex-header_info" role="status" aria-live="polite">Showing 1 to 10 of 20 entries</div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="complex-header_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="complex-header_previous"><a href="#" aria-controls="complex-header" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#" aria-controls="complex-header" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                        <li class="paginate_button page-item "><a href="#" aria-controls="complex-header" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                        <li class="paginate_button page-item next" id="complex-header_next"><a href="#" aria-controls="complex-header" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="styleSelector">
    </div>
</div>

<?php
include "Footer.php";
?>