package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.annotation.TargetApi;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

@TargetApi(Build.VERSION_CODES.GINGERBREAD) public class Set_payment extends Activity {
	EditText ed1,ed2,ed3;
	
	Button b1;
	
	String namespace="urn:demo";
	String method="payment";
	String soapaction="urn:demo/payment";
	public static String url="http://192.168.43.233/Project%20Official/webservice.php?wsdl";
	String lid="";
	
	
	String method1="amount";
	String soapaction1="urn:demo/amount";
	


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_set_payment);
		ed1=(EditText)findViewById(R.id.editText1);
		ed2=(EditText)findViewById(R.id.editText2);
		ed3=(EditText)findViewById(R.id.editText3);
		
		
		b1=(Button)findViewById(R.id.button1);
		
		try
		{
			if(android.os.Build.VERSION.SDK_INT>9)
			{
				StrictMode.ThreadPolicy policy=new StrictMode.ThreadPolicy.Builder().permitAll().build();
				StrictMode.setThreadPolicy(policy);
			}
		}
		catch(Exception e)
		{
			
		}
		SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		url="http://"+sh.getString("ip", "")+"/Project%20Official/webservice.php?wsdl";
		Log.d("=====", url);
		
		SharedPreferences sh1=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		lid=sh1.getString("lid", "");
		
		try
		{
			SoapObject sop=new SoapObject(namespace,method1);
			sop.addProperty("lid",lid);
			
			
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(url);
			htp.call(soapaction1, sev);
			
			String res=sev.getResponse().toString();
			Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
			
			ed1.setText(res);
			
			ed1.setEnabled(false);
					}
		catch(Exception e)
		{
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
		
		
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String amount=ed1.getText().toString();
				String acc=ed2.getText().toString();
				String secu=ed3.getText().toString();
				
				try
				{
					SoapObject sop=new SoapObject(namespace,method);
					sop.addProperty("amount",amount);
					sop.addProperty("acc",acc);
					sop.addProperty("secu",secu);
					sop.addProperty("lid",lid);
					
					
					
					
					SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
					sev.setOutputSoapObject(sop);
					
					HttpTransportSE htp=new HttpTransportSE(url);
					htp.call(soapaction, sev);
					
					String res=sev.getResponse().toString();
					Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
					if(res.equalsIgnoreCase("success"))
					{
						Intent inthm= new Intent(getApplicationContext(), Home.class);
						startActivity(inthm);
					}
					
					
					
							}
				catch(Exception e)
				{
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
				}
				
			}
		});
	}

	
}
