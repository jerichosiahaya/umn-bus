<?php
        createTable();
        function createTable() {
            require 'db-init.php';
            $u = $_SESSION['penumpangID'];
            $sql="SELECT golonganID FROM penumpang WHERE penumpangID='$u';";
            $result = $koneksi->query($sql);
	        $row= $result->fetch_assoc();
	        $userType=$row['golonganID'];
	        $sql_instance="SELECT * FROM bus_instances JOIN routes ON routes.RID=bus_instances.RID WHERE BusDate = CURDATE() ORDER BY DepTime ASC;";
            $result = $koneksi->query($sql_instance);
            if (!$result) {
                trigger_error('Invalid query: ' . $koneksi->error);
            }
		    	if ($result-> num_rows > 0) {
		    		echo '<table class="table table-hover" style="overflow-y:scroll; height:800px; display:block border-collapse:collapse;border-spacing:0;">
							    <thead>
							      <tr>
							        <th>Bus ID</th>
							        <th>Route ID</th>
							        <th>Seats Left</th>
							        <th>Departure Time</th>
							        <th>Source</th>
							        <th>Destination</th>
							        <th>Arrival Time</th>
							        <th>Book Tickets</th>
							      </tr>
							    </thead>
							    <tbody>';
				    // output data per baris
				    while($row = $result->fetch_assoc()) {
				    echo '<tr>
                    <td>'.$row["BID"].'</td>
                    <td>'.$row["RID"].'</td>
                    <td>'.$row["Seats_Left"].'</td>
                    <td>'.$row["DepTime"].'</td>
                    <td>'.$row["Src"].'</td>
                    <td>'.$row["Dst"].'</td>
                    <td>'.$row["DTime"].'</td>';
                        if($row['Seats_Left']>15){
                            echo '<td><a href="ticket_request.php?bid='.$row["BID"].'" class="btn btn-success" role="button">Book Now</a></td>
                  </tr>';}
                        elseif($row['Seats_Left']>0){
                            echo '<td><a href="ticket_request.php?bid='.$row["BID"].'" class="btn btn-warning" role="button">Book Now</a></td>
                  </tr>';}
                        else{
                            echo '<td><a href="ticket_request.php?bid='.$row["BID"].'" class="btn btn-danger disabled" role="button">Sold Out!</a></td>
                  </tr>';}
				    }
				    echo '</tbody> </table>';
				}
			}
        ?>