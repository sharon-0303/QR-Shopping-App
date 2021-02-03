package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.R.string;
import android.os.Build;
import android.os.Bundle;
import android.os.StrictMode;
import android.preference.PreferenceManager;
import android.annotation.TargetApi;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

@TargetApi(Build.VERSION_CODES.GINGERBREAD) public class Set_threshold extends Activity {
	EditText ed1;
	Button b1;
	String lid="";
	
	String namespace="urn:demo";
	String method="threshold";
	String soapaction="urn:demo/threshold";
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_set_threshold);
		
		ed1=(EditText)findViewById(R.id.editText1);
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
		lid=sh.getString("lid", "");
		
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String un=ed1.getText().toString();
				SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
				Editor edt=sh.edit();
				edt.putString("thld", un);
				edt.commit();
				Intent i=new Intent(getApplicationContext(),ProductScanning.class);
				i.putExtra("thre", un);
				startActivity(i);
//				try
//				{
//					SoapObject sop=new SoapObject(namespace,method);
//					
//					sop.addProperty("thr", un);
//					sop.addProperty("lid", lid);
//					
//					
//					
//					SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
//					sev.setOutputSoapObject(sop);
//					
//					HttpTransportSE htp=new HttpTransportSE(url);
//					htp.call(soapaction, sev);
//					
//					String res=sev.getResponse().toString();
//					Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
//					
//				}
//				catch(Exception e)
//				{
//					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
//				}
				
			}
		});
	
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.set_threshold, menu);
		return true;
	}

}
