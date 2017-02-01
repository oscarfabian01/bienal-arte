<table style="border: 1px solid gray; border-radius: 10px;">
	<tr>
		<td>
			.
		</td>	
	</tr>
	<tr>
		<td bgcolor="#f5f7f8">
			El estado de su transacción es <b> {{$estado or "Default Message"}} </b>
		</td>	
	</tr>
	<tr>
		<td>
			<p>
				Gracias por participar en la Primera bienal internacional de arte neosurealista en Colombia, muy pronto le estaremos informando si usted es seleccionado para participar como artista seleccionado para exponer su obra enviada.
			</p>
			<p>
				La bienal estará supervisada por un comité de dirección. El cual brindará asesoría y curaduría. El jurado seleccionará las obras ganadoras. Las cuales se harán merecedoras de un premio, que consiste en una exposición individual en una de las galerías patrocinadoras. Se contemplarán algunos premios adicionales.
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<table style="padding: 20px;">
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
									{{$description or "Default Message"}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Referencia
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$reference_pol or "Default Message"}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Valor
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$value or "Default Message"}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Moneda
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$currency or "Default Message"}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Fecha
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$date or "Default Message"}}
								</td>
							</tr>
							<tr>
								<td width="39%" height="25" bgcolor="#AFAFAF">
									Medio de Pago/Franquicia
								</td>
								<td width="61%" bgcolor="#f5f7f8">
									{{$payment_method_name or "Default Message"}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
