<table style="border: 1px solid gray; border-radius: 10px;">
	<tr>
		<td>
		.
		</td>	
	</tr>
	<tr>
		<td bgcolor="#f5f7f8">
			El estado de su transacción es {{$estado}}
		</td>	
	</tr>
	<tr>
		<td>
			<table style="padding: 20px;">
				<tr>
					<td style="padding-bottom:20px; font-weight: bold;">
						Hola {{$nickname_buyer}}
					</td>
				</tr>
				<tr>
					<td style="padding-bottom:20px">
						Transacción {{$reference_sale}} {{$estado}}
					</td>
				</tr>
				<tr>
					<td>	
						Datos de la transacción:
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Descripción
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$description}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Referencia
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$reference_pol}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Valor
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$value}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Moneda
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$currency}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Fecha
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$date}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Medio de Pago/Franquicia
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$payment_method_name}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>