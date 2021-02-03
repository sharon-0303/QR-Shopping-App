package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Bundle;
import android.preference.PreferenceManager;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.view.Menu;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.RatingBar;
import android.widget.Toast;

public class Rating extends Activity {
	RatingBar rb1;
	EditText ed1;
	Button b1;
	ListView l;
	
	String lid="";
	

	String namespace="urn:demo";
	String method="rate";
	String soapaction="urn:demo/rate";
	
	String method1="viewfeed";
	String soapaction1="urn:demo/viewfeed";
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_rating);
		rb1=(RatingBar)findViewById(R.id.ratingBar1);
		ed1=(EditText)findViewById(R.id.editText1);
		l=(ListView)findViewById(R.id.listView1);
		b1=(Button)findViewById(R.id.button1);
		SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
		lid=sh.getString("lid", "");
		
		try
		{
			SoapObject sop=new SoapObject(namespace,method1);
		
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction1, sev);
			
			String res=sev.getResponse().toString();
			Toast.makeText(getApplicationContext(),res, Toast.LENGTH_LONG).show();
			 String k[]=res.split("\\&");
			 String fid[]=new String[k.length];
			 String fee[]=new String[k.length];
			 for(int i=0;i<k.length;i++)
			 {
				 String a[]=k[i].split("\\#");
				 fid[i]=a[0];
				 fee[i]=a[1];
			 }
			 
			 ArrayAdapter<String>ad=new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1,fee);
			 l.setAdapter(ad);
		}
		catch(Exception e)
		{
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
		
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				String feed=ed1.getText().toString();
				Float rat=rb1.getRating();
				
				
				try
				{
					SoapObject sop=new SoapObject(namespace,method);
					sop.addProperty("lid",lid);
					sop.addProperty("r",Float.toString(rat));
					sop.addProperty("fbk",feed);
					
					SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
					sev.setOutputSoapObject(sop);
					
					HttpTransportSE htp=new HttpTransportSE(Login.url);
					htp.call(soapaction, sev);
					
					String res=sev.getResponse().toString();
					Toast.makeText(getApplicationContext(),res, Toast.LENGTH_LONG).show();	
					Intent i=new Intent(getApplicationContext(),Rating.class);
					startActivity(i);
				}
				catch(Exception e)
				{
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
				}
				
			}
		});
	}

	

}
