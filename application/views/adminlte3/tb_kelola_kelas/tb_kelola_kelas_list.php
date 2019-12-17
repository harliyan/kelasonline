<div class="container">
    <br>
    <br>
    <br>


        <h2 style="margin-top:0px">Tabel Kelola Kelas</h2>
        <br>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/tb_kelola_kelas/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('tb_kelola_kelas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                       <!--  <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tb_kelola_kelas'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?> -->
                          <!-- <button class="btn btn-primary" type="submit">Search</button> -->
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kapasitas</th>
		<th>Jam Tersedia</th>
		<th>Action</th>
            </tr><?php
            foreach ($tb_kelola_kelas_data as $tb_kelola_kelas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tb_kelola_kelas->kapasitas ?></td>
			<td><?php echo $tb_kelola_kelas->jam_tersedia ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/tb_kelola_kelas/read/'.$tb_kelola_kelas->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/tb_kelola_kelas/update/'.$tb_kelola_kelas->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/tb_kelola_kelas/delete/'.$tb_kelola_kelas->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
               </div>
            </div>
        </div>
    </div>
</div>