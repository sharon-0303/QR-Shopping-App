package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.os.StrictMode;
import android.annotation.TargetApi;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class Purchasecodegeneration extends Activity {
	TextView tv3;
	Button b1;
	Handler hd;
	String namespace="urn:demo";
	String method="transaction_status";
	String soapaction="urn:demo/transaction_status";
	String gen="";
	String flag="";
	@TargetApi(Build.VERSION_CODES.GINGERBREAD) @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_purchasecodegeneration);
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
	
		gen=getIntent().getStringExtra("gen");
		tv3=(TextView)findViewById(R.id.textView3);
		b1=(Button)findViewById(R.id.button1);
		b1.setEnabled(false);
		tv3.setText(gen);
		hd=new Handler();
		hd.post(r);
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				if(flag.equalsIgnoreCase("online")){
					Intent i=new Intent(getApplicationContext(),Set_payment.class);
					startActivity(i);
				}
				else if(flag.equalsIgnoreCase("completed")){
					Intent i=new Intent(getApplicationContext(),Home.class);
					startActivity(i);
				}
				
				
			}
		});
	}

	Runnable r=new Runnable() {
		
		@Override
		public void run() {
			// TODO Auto-generated method stub
			String result=transaction_status();
			if(result.equalsIgnoreCase("pending")){
				b1.setText("Go to Online payment");
				b1.setEnabled(true);
				flag="online";
				hd.removeCallbacks(r);
			}
			else if(result.equalsIgnoreCase("paid")){
				b1.setText("Payment Successful..");
				b1.setEnabled(true);
				flag="completed";
				hd.removeCallbacks(r);
			}
			else{
				hd.postDelayed(r, 5000);
			}
			
		}
	};
	private String transaction_status() {
		String res="";
		try {
			SoapObject sop=new SoapObject(namespace,method);
			sop.addProperty("gen_code", gen);
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction, sev);
			
			res=sev.getResponse().toString();
		} catch (Exception e) {
			// TODO: handle exception
		}
		return res;
	}
}
