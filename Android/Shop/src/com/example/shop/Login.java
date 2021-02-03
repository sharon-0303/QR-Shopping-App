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
import android.widget.TextView;
import android.widget.Toast;

public class Login extends Activity {
	EditText ed1,ed2;
	Button b1,b2,b3;
	
	String namespace="urn:demo";
	String method="login";
	String soapaction="urn:demo/login";
	public static String url="http://192.168.43.233/Project%20Official/webservice.php?wsdl";

	@TargetApi(Build.VERSION_CODES.GINGERBREAD) @Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_login);
		ed1=(EditText)findViewById(R.id.editText1);
		ed2=(EditText)findViewById(R.id.editText2);
		b1=(Button)findViewById(R.id.button1);
		b2=(Button)findViewById(R.id.button2);
		b3=(Button)findViewById(R.id.button3);
		
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
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String un=ed1.getText().toString();
				String pn=ed2.getText().toString();
				int flag=0;
				
				if(un.equals("")){
					ed1.setError("Enter Username");
					ed1.setFocusable(true);
				flag++;
				}
				if(pn.equals("")){
					ed1.setError("Enter Password");
					ed1.setFocusable(true);
				flag++;
				}
				if(flag==0){
				try
				{
					SoapObject sop=new SoapObject(namespace,method);
					
					sop.addProperty("uname", un);
					sop.addProperty("pname",pn);
					
					SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
					sev.setOutputSoapObject(sop);
					
					HttpTransportSE htp=new HttpTransportSE(url);
					htp.call(soapaction, sev);
					
					String res=sev.getResponse().toString();
					Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
					if(res.equals("no"))
					{
						Toast.makeText(getApplicationContext(), "Invalid UserName Or Password", Toast.LENGTH_LONG).show();
					}
					else
					{
						SharedPreferences sh=PreferenceManager.getDefaultSharedPreferences(getApplicationContext());
						Editor e=sh.edit();
						e.putString("lid", res);
						e.commit();
						Intent i=new Intent(getApplicationContext(),Home.class);
						startActivity(i);
					}
				}
				catch(Exception e)
				{
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
				}
				}
			}
		});
		
		b2.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				
				Intent i=new Intent(getApplicationContext(),ForgotPassword.class);
				startActivity(i);
				
			}
		});
		
		b3.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				Intent i=new Intent(getApplicationContext(),Customer_registration.class);
				startActivity(i);
				
			}
		});
	}

	

}
