                                <div class="book-ur-car">
                                    <!-- <form action="<?php //echo site_url('transaksi/search_keyword');?>" method = "post"> -->
                                        <form action="<?php echo site_url('transaksi/submit');?>" method = "post">
                                        <div class="pick-location bookinput-item">
                                            <?php
                                                $dd_rute_attribute = 'class="custom-select" required="required"';
                                                echo form_dropdown('id_rute', $dd_rute, $rute_selected, $dd_rute_attribute);
                                            ?>
                                        </div>

                                        <div class="pick-date bookinput-item">
                                            <input name="tanggal" type="date" id="startDate2" placeholder="Pick Date" />
                                        </div>

                                        <div class="bookcar-btn bookinput-item">
                                            <button type="submit">Cari</button>
                                        </div>
                                    </form>
                                </div>

<!-- <?php //echo "<pre>";
//print_r ($this->session->all_userdata());
//echo "</pre>"; ?> -->

                                <!--jquery dan select2-->
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
